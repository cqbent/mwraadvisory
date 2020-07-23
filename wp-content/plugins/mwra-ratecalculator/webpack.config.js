const path = require('path')

module.exports = {
	entry: './src/js/rc.js',
	output: {
		filename: 'rc_compiled.js',
		path: path.resolve(__dirname, 'assets/js')
	}
}
