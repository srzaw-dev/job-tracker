{{-- Shared <head> for all authenticated Trackr pages --}}
{{-- Usage: @include('partials.trackr-head', ['title' => 'Page Title']) --}}
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Trackr - {{ $title ?? 'Career Manager' }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "secondary": "#565e74",
            "tertiary-fixed-dim": "#ffb690",
            "tertiary": "#994100",
            "on-secondary": "#ffffff",
            "surface": "#f8f9ff",
            "surface-variant": "#d3e4fe",
            "on-secondary-fixed-variant": "#3f465c",
            "tertiary-container": "#c05400",
            "tertiary-fixed": "#ffdbca",
            "on-error-container": "#93000a",
            "primary-fixed-dim": "#ffb599",
            "background": "#f8f9ff",
            "on-tertiary-fixed": "#341100",
            "surface-bright": "#f8f9ff",
            "on-error": "#ffffff",
            "error-container": "#ffdad6",
            "on-primary-fixed-variant": "#7f2b00",
            "outline-variant": "#e2bfb2",
            "surface-container-low": "#eff4ff",
            "inverse-primary": "#ffb599",
            "on-tertiary-container": "#fffbff",
            "primary-container": "#cc4900",
            "on-primary": "#ffffff",
            "error": "#ba1a1a",
            "surface-container-lowest": "#ffffff",
            "surface-dim": "#cbdbf5",
            "on-tertiary-fixed-variant": "#783200",
            "secondary-container": "#dae2fd",
            "surface-container-highest": "#d3e4fe",
            "primary": "#a33900",
            "surface-container-high": "#dce9ff",
            "primary-fixed": "#ffdbce",
            "on-surface-variant": "#5a4138",
            "outline": "#8e7166",
            "on-surface": "#0b1c30",
            "secondary-fixed": "#dae2fd",
            "secondary-fixed-dim": "#bec6e0",
            "inverse-on-surface": "#eaf1ff",
            "on-background": "#0b1c30",
            "on-primary-fixed": "#370e00",
            "on-secondary-container": "#5c647a",
            "inverse-surface": "#213145",
            "on-primary-container": "#fffbff",
            "surface-container": "#e5eeff",
            "on-secondary-fixed": "#131b2e",
            "on-tertiary": "#ffffff",
            "surface-tint": "#a73a00"
          },
          "borderRadius": {
            "DEFAULT": "0.125rem",
            "lg": "0.25rem",
            "xl": "0.5rem",
            "full": "0.75rem"
          },
          "spacing": {
            "base": "8px",
            "xs": "4px",
            "xl": "32px",
            "margin-mobile": "16px",
            "sm": "8px",
            "lg": "24px",
            "md": "16px",
            "gutter": "24px",
            "margin-desktop": "40px"
          },
          "fontFamily": {
            "body-md": ["Hanken Grotesk"],
            "label-md": ["Hanken Grotesk"],
            "body-lg": ["Hanken Grotesk"],
            "label-sm": ["Hanken Grotesk"],
            "headline-sm": ["Hanken Grotesk"],
            "body-sm": ["Hanken Grotesk"],
            "headline-lg": ["Hanken Grotesk"],
            "headline-lg-mobile": ["Hanken Grotesk"],
            "headline-md": ["Hanken Grotesk"]
          },
          "fontSize": {
            "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
            "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600"}],
            "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
            "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500"}],
            "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
            "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
            "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
            "headline-lg-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
            "headline-md": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}]
          }
        }
      }
    }
</script>
<style>
    body { font-family: 'Hanken Grotesk', sans-serif; background-color: #f8f9ff; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2bfb2; border-radius: 10px; }
    .form-input-focus:focus { outline: none; border-width: 2px; border-color: #a33900; }
    .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; }
</style>
