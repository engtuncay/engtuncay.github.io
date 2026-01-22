module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./app/Views/**/*.html",
    "./public/**/*.php"
  ],
  safelist: [
    'bg-red-500', 'bg-green-500',
    { pattern: /^text-(red|green|blue)-(400|500)$/ }
  ],
  theme: {},
  plugins: [],
}
