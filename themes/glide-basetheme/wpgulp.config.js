/**
 * Glide Design Gulp Configuration File
 */
module.exports = {
	// Project options.
	projectName: 'Sample Theme',
	projectURL: 'http://basetheme.local/',
	projectVersion: '1.0.0',

	// Browser Sync.
	browserAutoOpen: false,
	injectChanges: true,

	// Styles.
	styleSRC: 'assets/css/bundle.scss',
	editorStyleSRC: 'assets/css/editor-style.scss',
	styleDestination: 'assets/css/',
	editorStyleDestination: 'assets/css/',
	outputStyle: 'compact',
	errLogToConsole: true,
	precision: 10,
	cssVendorPath: 'assets/css/vendor/',
	cssPath: 'assets/css/',

	// Scripts.
	jsSRC: [ '!assets/js/partials/', 'assets/js/partials/site-scripts.js' ],
	jsDestination: 'assets/js/',
	jsFile: 'bundle',

	// Watch file paths.
	watchStyles: 'assets/css/partials/**/*',
	watchEditorStyles: 'assets/css/editor-style.scss',
	watchJs: 'assets/js/**/*',
	watchPhp: '**/*.php',
	watchHtml: '**/*.html',

	// Auto Prefixer
	BROWSERS_LIST: [ 'last 10 version' ],
	zipDestination: './../', // Default: Parent folder.
	zipIncludeGlob: [ './**/*' ],
	zipIgnoreGlob: [
		'!./{node_modules,node_modules/**/*}',
		'!./.git',
		'!./.svn',
		'!./gulpfile.babel.js',
		'!./wpgulp.config.js',
		'!./.eslintignore',
		'!./phpcs.xml.dist',
		'!./vscode',
		'!./package.json',
		'!./package-lock.json',
		'!./{html-files,html-files/**/*}',
		'!./{notes,notes/**/*}',
		'!./{node_modules,node_modules/**/*}',
		'!./.editorconfig',
		'!./.eslintrc',
		'!./.gitignore',
		'!./.linthtmlrc',
		'!./.phpcs',
		'!./.prettierignore',
		'!./.prettierrc',
		'!./.stylelintignore',
		'!./.stylelintrc',
		'!./.zip',
		'!./composer.json',
		'!./package-lock.json',
	],
	zipName: 'basetheme.zip',

};
