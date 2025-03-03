/**
 * Gulp JS for Glide Design WordPress Projects.
 */

const config = require( './wpgulp.config.js' );

/**
 * Load Plugins.
 */
const gulp = require( 'gulp' );

// CSS related plugins.
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const postcss = require( 'gulp-postcss' );
const autoprefixer = require( 'autoprefixer' );
const cssnano = require( 'gulp-cssnano' );
const sourcemaps = require( 'gulp-sourcemaps' );

// JS related plugins.
const concat = require( 'gulp-concat' );

// Utility related plugins.
const rename = require( 'gulp-rename' );
const lineec = require( 'gulp-line-ending-corrector' );
const filter = require( 'gulp-filter' );
const notify = require( 'gulp-notify' );
const browserSync = require( 'browser-sync' ).create();
const remember = require( 'gulp-remember' );
const plumber = require( 'gulp-plumber' );
const beep = require( 'beepbeep' );
const count = require( 'gulp-count' );

/**
 * Custom Error Handler.
 *
 * @param  r
*/

const errorHandler = ( r ) => {
	 notify.onError( '\n\n❌  ===> ERROR: <%= error.message %>\n' )( r ); // Message to be displayed when error function is called
	 beep( 2 ); // Beep two times on error
	 // this.emit('end');
};

/**
 * Task: `browser-sync`.
 *
 * @param  done
 */
const browsersync = ( done ) => {
	 browserSync.init( {
		 proxy: config.projectURL,
		 open: config.browserAutorbt,
		 injectChanges: config.injectChanges,
		 watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ],
	 } );
	 done();
};
const reload = ( done ) => {
	 browserSync.reload();
	 done();
};

/**
 * Task: `styles`.
 */
gulp.task( 'styles', () => {
	 const plugins = [
		 autoprefixer( {
			 overrideBrowserslist: config.BROWSERS_LIST,
		 } ),
	 ];
	 return gulp
		 .src( config.styleSRC, {
			 allowEmpty: false,
		 } )
		 .pipe( plumber( errorHandler ) )
		 .pipe( sourcemaps.init() )
		 .pipe(
			 sass( {
				 errLogToConsole: config.errLogToConsole,
				 precision: config.precision,
			 } ),
		 )
		 .on( 'error', sass.logError )
		 .pipe( postcss( plugins ) )
		 .pipe( sourcemaps.write( './' ) )
		 .pipe( lineec() )
		 .pipe( gulp.dest( config.styleDestination ) )
		 .pipe( filter( '**/*.css' ) )
		 .pipe( browserSync.stream() )
		 .pipe( sourcemaps.init( { loadMaps: true } ) )
		//  .pipe( cssnano() )
		 .pipe(
			rename( {
				suffix: '.min',
		   } ),
	   	 )
		.pipe( sourcemaps.write( './' ) )
		.pipe( lineec() )
		.pipe( gulp.dest( config.styleDestination ) )
		.pipe( filter( '**/*.css' ) )
		.pipe( browserSync.stream() )
		 .pipe(
			 notify( {
				 message: '\n\n✅ ===> Styles ✅ completed!\n',
				 onLast: true,
			 } ),
		 );
} );

/**
 * Task: `Editor styles`.
 */
 gulp.task( 'editor-style', () => {
	const plugins = [
		autoprefixer( {
			overrideBrowserslist: config.BROWSERS_LIST,
		} ),
	];
	return gulp
		.src( config.editorStyleSRC, {
			allowEmpty: false,
		} )
		.pipe( plumber( errorHandler ) )
		.pipe( sourcemaps.init() )
		.pipe(
			sass( {
				errLogToConsole: config.errLogToConsole,
				precision: config.precision,
			} ),
		)
		.on( 'error', sass.logError )
		.pipe( postcss( plugins ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( lineec() )
		.pipe( gulp.dest( config.editorStyleDestination ) )
		.pipe( filter( '**/*.css' ) )
		.pipe( browserSync.stream() )
		.pipe( sourcemaps.init( { loadMaps: true } ) )
	   //  .pipe( cssnano() )
		.pipe(
		   rename( {
			   suffix: '.min',
		  } ),
		   )
	   .pipe( sourcemaps.write( './' ) )
	   .pipe( lineec() )
	   .pipe( gulp.dest( config.editorStyleDestination ) )
	   .pipe( filter( '**/*.css' ) )
	   .pipe( browserSync.stream() )
		.pipe(
			notify( {
				message: '\n\n✅ ===> Styles ✅ completed!\n',
				onLast: true,
			} ),
		);
} );

/**
 * Task: `Scripts`.
 */
gulp.task( 'scripts', () => {
	 return (
		 gulp
			 .src( config.jsSRC, {

			 } )
			 .pipe( count( '## number of JS files selected' ) )
			 .pipe( plumber( errorHandler ) )
			 .pipe( remember( config.jsVendorSRC ) )
			 .pipe(
				 concat( config.jsFile + '.js', {
					 newLine: ';',
				 } ),
			 )
			 .pipe( lineec() )
			 .pipe( gulp.dest( config.jsDestination ) )
			 .pipe(
				 rename( {
					 basename: config.jsFile,
					 suffix: '.min',
				 } ),
			 )
			 .pipe( lineec() )
			 .pipe( gulp.dest( config.jsDestination ) )
			 .pipe(
				 notify( {
					 message: '\n\n✅ ===> Scripts ✅ completed!\n',
					 onLast: true,
				 } ),
			 )
	 );
} );

/**
 * Watch Tasks.
 */
gulp.task(
	 'default',
	 gulp.series( 'styles', 'editor-style',  'scripts',  browsersync, () => {
		 gulp.watch( config.watchPhp, reload );
		 gulp.watch(
			 [ config.watchStyles, '!assets/css/bundle.css', '!assets/css/bundle.css.map', '!assets/css/bundle.min.css', '!assets/css/bundle.min.css.map' ],
			 gulp.parallel( 'styles' ),
		 );
		 gulp.watch(
			 [ config.watchStyles, '!assets/css/editor-style.css', '!assets/css/editor-style.css.map','!assets/css/editor-style.min.css', '!assets/css/editor-style.min.css.map'],
			 gulp.parallel( 'editor-style' ),
		 );
		 gulp.watch(
			 [ config.watchEditorStyles, '!assets/css/bundle.css', '!assets/css/bundle.css.map', '!assets/css/bundle.min.css', '!assets/css/bundle.min.css.map' ],
			 gulp.parallel( 'styles' ),
		 );
		 gulp.watch(
			 [ config.watchEditorStyles, '!assets/css/editor-style.css', '!assets/css/editor-style.css.map','!assets/css/editor-style.min.css', '!assets/css/editor-style.min.css.map'],
			 gulp.parallel( 'editor-style' ),
		 );
		 gulp.watch(
			 [ config.watchJs, '!assets/js/bundle.js', '!assets/js/bundle.min.js' ],
			 gulp.series( 'scripts', reload ),
		 );
		 gulp.watch( config.watchHtml, reload );
	 } ),
);
