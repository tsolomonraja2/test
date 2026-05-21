# Custom Child Theme

This is a starter child theme that:

1. Loads the parent theme stylesheet.
2. Loads the child theme stylesheet.
3. Copies parent customizer settings (`theme_mods`) one time when the child theme is activated.

## Required update before use

Edit `style.css` and set the `Template:` value to your actual parent theme directory name.

Example:

- If parent theme folder is `astra`, use `Template: astra`
- If parent theme folder is `generatepress`, use `Template: generatepress`

## Installation

1. Zip the `custom-child-theme` folder.
2. Upload via **Appearance → Themes → Add New → Upload Theme**, or copy it to `wp-content/themes/`.
3. Activate **Custom Child Theme**.

