# Ecotron-Octopus

# Introduction

**OCTOPUS** (Orignal Control Tools fOr Processing and acqUire Systems) is a set of services related to the execution of experiments on the platforms of CEREEP-Ecotron IDF.


# Parsedown library
This project uses **Parsedown** to render Markdown files as HTML. It includes a simple file and directory browser with support for viewing and navigating through various file types.

## Why Choose Parsedown?

Fast and Lightweight: Parsedown is one of the fastest Markdown parsers for PHP and has minimal dependencies, making it ideal for performance.
Easy to Use: Its simple API allows for quick integration with just a few lines of code.
Customizable: It supports common Markdown features and can be easily extended to suit specific needs.
Popular: It's widely used in PHP communities and known for reliability.

## Installation

### Requirements

- PHP >= 7.4

### Step 1: Clone the repository

git clone https://github.com/your-repository-url
cd your-project-directory

### Step 2: Install Parsedown

composer require parsedown/parsedown

### Step 3: Include Composer's autoloader

require 'vendor/autoload.php';


# Available Servers List Project

## Description

The **Available Servers List** is a web application that dynamically generates a list of servers with clickable links. The page displays information about servers (such as Gitlab, Portainer, and Vikunja) in a clean, responsive interface using HTML, CSS, Bootstrap JavaScript, and PHP. The project also allows viewing Markdown files and browsing directories with integrated **Parsedown** for rendering Markdown content.

## Project Structure

/ (root)
│
├── index.html            # Main file that displays the available servers list and page layout
├── doc.php               # Handles displaying Markdown files (converts them to HTML using Parsedown)
├── browse.php            # Used for listing files and directories (and allows navigation)
└── header.php
└── footer.php
├── image/                # Contains image files (icons and logos used in the UI)
├── Octopus/              # Directory containing all Markdown documentation files
│   ├── Gitlab/
│   ├── Portainer/
│   └── Vikunja/
├── vendor/               # Contains third-party libraries, including Parsedown for rendering Markdown
├── README.md             # This file
└── composer.json         # Composer dependency file






# index.html

## Project Description
This project is an interactive web page that displays a list of available servers in a user-friendly interface. The main objective is to provide users with quick and easy access to various services hosted on these servers via direct links.

### Key Features:
1. **Modern User Interface**: Use of Bootstrap for a responsive and elegant design.
2. **Smooth Navigation**: A navigation bar with a logo and a "Documentation" button to access the project documentation.
3. **Server List**: Servers are presented as clickable cards, each containing a representative image and a title.
4. **Custom Footer**: Includes copyright information and the current version of the project.

---

## Technologies Used

- **HTML5**: Basic structure of the page.
- **CSS3**: Custom styles for visual appearance.
- **Bootstrap 5**: CSS framework for responsive design and ready-to-use components.
- **JavaScript**: Handles user interactions (e.g., opening the documentation).






# doc.php

# Project: Markdown and Image Viewer

## CopyProject Description

This project is a PHP script that dynamically displays **Markdown** (`.md`) files and images (`.jpg`, `.png`, etc.) from a directory specified in the URL. The main objective is to provide a simple interface to render Markdown files as HTML and serve images with the correct MIME types.

### Key Features:
1. **Markdown File Display**: The script uses the `Parsedown` library to convert Markdown files into HTML.
2. **Image Support**: Images are served with the appropriate MIME types (`image/jpeg`, `image/png`, etc.).
3. **Error Handling**: If the specified file does not exist, an error message is displayed.
4. **Directory Navigation**: If no specific file is provided, the script includes another file (`browse.php`) to list available files in the directory.

---

## Technologies Used

- **PHP**: Main script to handle requests and serve files.
- **Parsedown**: PHP library for converting Markdown to HTML.
- **HTML/CSS**: Final rendering of Markdown content.
- **MIME Types**: Handling of file types for images.

---

## How to Use This Project

1. **Installation**:
   - Clone this repository onto your local or remote server.
   - Ensure PHP is installed and configured on your server.
   - Place the `Parsedown.php` file in the same directory as the main script.

2. **Accessing Files**:
   - To display a Markdown file or an image, use the following URL format:
     ```
     http://your-domain.com/index.php?dir=path/to/directory&file=filename.md
     ```
   - Replace `path/to/directory` with the relative path to the directory containing the file, and `filename.md` with the desired file name.

3. **Directory Navigation**:
   - If no file is specified, the script includes `browse.php` to display a list of available files.

---

## Possible Modifications

### 1. Add Support for New File Formats
- You can extend the script to support additional file formats (e.g., PDFs, videos) by adding more cases in the `switch` statement that handles MIME types.

### 2. Improve Error Handling
- Currently, a simple error message is displayed if the file does not exist. You can enhance this by redirecting to a custom error page or logging errors for later debugging.








# header.php

## Description of the Project

This project is a web interface designed to provide users with an interactive and visually appealing experience. The page features a responsive design using **Bootstrap**, with a navigation bar, a centered title container, and customizable cards for displaying content. It also includes functionality for navigating between pages.

### Key Features:
1. **Responsive Design**: Utilizes Bootstrap 5 for a mobile-friendly layout.
2. **Dynamic Navigation**:
   - A navigation bar with a logo and title.
   - Buttons for returning to the homepage or navigating back to the previous page.
3. **Customizable Cards**: Cards are styled with hover effects and can be used to display images, titles, or links.
4. **Footer**: A fixed footer at the bottom of the page provides additional information like copyright or version details.

---

## Technologies Used

- **HTML5**: Basic structure of the page.
- **CSS3**: Custom styles for visual appearance, including hover effects and responsive design.
- **Bootstrap 5**: CSS framework for responsive design and pre-built components.
- **JavaScript**: Handles dynamic button behavior (e.g., "Back" or "Return to Home").
- **Bootstrap Icons**: Provides icons for buttons and other UI elements.

## Possible Modifications

### 1. Add More Pages
- You can extend the navigation bar to include links to additional pages by adding more buttons or dropdown menus.

### 2. Improve Accessibility
- Add ARIA labels and roles to improve accessibility for screen readers.
- Ensure sufficient color contrast for text and background elements.

### 3. Enhance Card Functionality
- Add interactivity to the cards, such as modals or tooltips, to display additional information when hovered or clicked.

### 4. Optimize for Performance
- Minify CSS and JavaScript files to reduce load times.
- Use lazy loading for images to improve performance on slower connections.






# browse.php


## Description of the Project

This project is a PHP-based directory and file browser that allows users to navigate through directories and view files with appropriate icons based on their type. The interface is styled using **Bootstrap** for a responsive and visually appealing design.

### Key Features:
1. **Directory Listing**: Displays the contents of a specified directory, including subdirectories and files.
2. **File Type Icons**: Uses different icons for folders, PDFs, images, and other file types.
3. **Dynamic Navigation**: Users can click on directories to browse deeper or open files for viewing.
4. **Security**: Ensures that only allowed directories within a base path (`octopus_documentation`) can be accessed.
5. **Responsive Design**: Styled with Bootstrap for compatibility across devices.

---

## Technologies Used

- **PHP**: Core scripting language for directory listing and file handling.
- **HTML/CSS**: Structure and styling of the page.
- **Bootstrap 5**: CSS framework for responsive design and pre-built components.
- **JavaScript**: Optional enhancements for interactivity (not included in this script).
- **Icons**: Custom icons for folders, PDFs, images, and other file types.


## Possible Modifications

### 1. Add Support for More File Types
- Extend the `$images` array to include icons for additional file types (e.g., `.docx`, `.xlsx`, `.mp3`).

### 2. Improve Security
- Enhance the `verifyPath` function to handle edge cases, such as symbolic links or deeply nested directories.
- Implement user authentication to restrict access to sensitive directories.

### 3. Enhance User Interface
- Add sorting options (e.g., by name, size, or date modified).
- Include a search bar to filter files and directories.

### 4. Optimize Performance
- Implement caching for frequently accessed directories to reduce server load.
- Use lazy loading for icons to improve performance on slower connections.