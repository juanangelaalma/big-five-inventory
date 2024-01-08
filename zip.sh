#!/bin/bash

file_name="files.zip"

files_and_folders_to_zip=(
  "app"
  "bootstrap"
  "config"
  "data"
  "database"
  "public"
  "resources"
  "routes"
  "artisan"
  "composer.json"
  "composer.lock"
  "Makefile"
  "package.json"
  "package-lock.json"
  "phpunit.xml"
  "postcss.config.js"
  "tailwind.config.js"
  "vite.config.js"
)

zip -r "$file_name" "${files_and_folders_to_zip[@]}"

echo "Successfully zipped: $file_name"
