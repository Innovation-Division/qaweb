import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
 	    input: [
                'resources/js/main.jsx',                        // Your app entry
                'resources/css/app.css'
            ],
            refresh: true,
        }),
        react(),
    ],
    build: {
        outDir: "public/build",
        emptyOutDir: true,
        chunkSizeWarningLimit: 2000,
    },
    base: "/build",
});
