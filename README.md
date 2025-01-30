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
├── image/                # Contains image files (icons and logos used in the UI)
├── Octopus/              # Directory containing all Markdown documentation files
│   ├── Gitlab/
│   ├── Portainer/
│   └── Vikunja/
├── vendor/               # Contains third-party libraries, including Parsedown for rendering Markdown
├── README.md             # This file
└── composer.json         # Composer dependency file


