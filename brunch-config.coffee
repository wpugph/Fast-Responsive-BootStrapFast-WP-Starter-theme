exports.config =
  # See http://brunch.io/#documentation for docs.
  npm:
    enabled: false

  server:
    run: true

  paths:
    public: 'assets'

  files:
    javascripts:
      joinTo:
        'js/jquery.js': /^(bower_components[\\/]jquery[\\/]dist[\\/]jquery.js)/
        'admin/js/customizer.js': /^(app[\\/]admin[\\/]js)/
        'js/themes.js':[
           /^(app[\\/]scripts)/
           /^(bower_components[\\/]jquery[\\/]dist[\\/]jquery.js)/
        ]

    stylesheets:
      joinTo:
        'css/themestyle.css':[
           /^(app[\\/]scss[\\/]styles)/
        ]
        'css/app-rtl.css': [
          /^(app[\\/]scss[\\/]styles-rtl)/
          /(bower_components[\\/]bootstrap-rtl[\\/]dist[\\/]css[\\/]bootstrap-rtl.css)/
        ]
        'css/editor.css':[
           /^(app[\\/]scss[\\/]editor(?!-rtl))/
        ]
        'css/editor-rtl.css': [
          /^(app[\\/]scss[\\/]editor-rtl)/
        ]

  modules:
    wrapper: false
    definition: false

  conventions:
      # we don't want javascripts in asset folders to be copied like the one in
      # the bootstrap assets folder
      assets: /assets[\\/](?!javascripts)/

  plugins:
    sass:
      debug: 'comments' # or set to 'debug' for the FireSass-style output
      mode: 'native' # set to 'ruby' to force ruby
      allowCache: true
      options:
        includePaths: ['bower_components']

	# define the external fonts that will be copied from the fonts manager
	# 'destination' : ['source']
	# 'fonts': ['bower_components/bootstrap-sass-official/assets/fonts/bootstrap*']
#         'fonts': ['app/fonts/*']
    assetsmanager:
      copyTo:
        'fonts': ['app/fonts/*']
