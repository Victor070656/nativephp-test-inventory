/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            primary: '#4f46e5',
            secondary: '#fbbf24',
            accent: '#10b981',
            neutral: '#1f2937',
            'base-100': '#ffffff',
            info: '#3b82f6',
            success: '#22c55e',
            warning: '#f59e0b',
            error: '#ef4444',
        },
    },
  },
  plugins: [],
}
