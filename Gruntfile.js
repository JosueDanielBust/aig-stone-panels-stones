module.exports =  function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.initConfig({
		copy: {
			main: {
				expand: true,
				src: ['*.php', 'css/*.css', 'README.md', 'LICENSE.md'],
				dest: '/Applications/MAMP/htdocs/plugins/wp-content/plugins/aig-stone-panels-stones/',
			},
			dist: {
				expand: true,
				src: ['*.php', 'css/*.css', 'README.md', 'LICENSE.md'],
				dest: 'dist/',
			}
		},
		watch: {
			copy: {
				files: ['*.*', 'css/*.css'],
				tasks: ['copy:dist'],
				options: {
					event: ['all'],
					dateFormat: function(time) {
						grunt.log.writeln(('COPY watch finished in ' + time + 'ms')['cyan']);
						grunt.log.writeln('Waiting for more changes...'['green']);
					},
				},
			},
			sass: {
				files: ['sass/*.scss'],
				tasks: ['sass'],
				options: {
					event: ['all'],
					dateFormat: function(time) {
						grunt.log.writeln(('SASS watch finished in ' + time + 'ms')['cyan']);
						grunt.log.writeln('Waiting for more changes...'['green']);
					},
				},
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compact'
				},
				files: {
					'css/main.css': 'sass/main.scss'
				}
			}
		},
	});

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('dist', ['copy:dist']);
	grunt.registerTask('styles', ['sass']);
};
