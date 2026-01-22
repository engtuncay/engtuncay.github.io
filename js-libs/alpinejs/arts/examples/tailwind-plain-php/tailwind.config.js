module.exports = {
  content: [
    "./**/*.php",
    "./templates/**/*.php",
    "./src/**/*.html"
  ],
  safelist: [
    'bg-red-500', 'bg-green-500',
    { pattern: /^text-(red|green|blue)-(400|500)$/ }
  ],
  theme: {},
  plugins: [],
}
