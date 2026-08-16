#!/usr/bin/env node
/* eslint-disable @typescript-eslint/no-require-imports */

const fs = require('fs');
const path = require('path');
const { runAllRules } = require('../src/engine');

// 1. Parse arguments for --config
const args = process.argv.slice(2);
let configPath = 'gm-lint.json';

for (let i = 0; i < args.length; i++) {
  if ((args[i] === '--config' || args[i] === '-c') && args[i + 1]) {
    configPath = args[i + 1];
    break;
  }
}

// 2. Load and parse config
let config = {};
try {
  const absoluteConfigPath = path.resolve(process.cwd(), configPath);
  if (fs.existsSync(absoluteConfigPath)) {
    const configFileContent = fs.readFileSync(absoluteConfigPath, 'utf8');
    config = JSON.parse(configFileContent);
  } else {
    console.warn(`Warning: Config file not found at ${configPath}, proceeding with defaults.`);
  }
} catch (error) {
  console.error(`Error parsing config file: ${error.message}`);
  process.exit(1);
}

// Helper function to recursively find all .gml files
function getAllGmlFiles(dir, fileList = []) {
  const files = fs.readdirSync(dir);
  
  files.forEach(file => {
    const filePath = path.join(dir, file);
    const stat = fs.statSync(filePath);

    if (file === 'node_modules' || file.startsWith('.')) {
      return;
    }

    if (stat.isDirectory()) {
      getAllGmlFiles(filePath, fileList);
    } else if (path.extname(file) === '.gml') {
      fileList.push(filePath);
    }
  });

  return fileList;
}

// Function to process linting results and exit appropriately
function handleLintResults(allErrors) {
  if (allErrors.length > 0) {
    console.log(`❌ Linting failed with ${allErrors.length} error(s):`);
    allErrors.forEach(err => {
      console.log(`  ${err.file} - Line ${err.line} [${err.rule}]: ${err.message}`);
    });
    process.exit(1);
  } else {
    console.log('✨ Linting passed with no errors!');
    process.exit(0);
  }
}

// 3. Determine execution path: Stdin vs Directory Scan
if (!process.stdin.isTTY) {
  let inputData = '';
  process.stdin.setEncoding('utf8');

  process.stdin.on('data', (chunk) => {
    inputData += chunk;
  });

  process.stdin.on('end', () => {
    const errors = runAllRules('stdin', inputData, config);
    handleLintResults(errors);
  });
} else {
  try {
    const projectRoot = process.cwd();
    const gmlFiles = getAllGmlFiles(projectRoot);

    if (gmlFiles.length === 0) {
      console.log('⚠️ No .gml files found in the project directory.');
      process.exit(0);
    }

    let allErrors = [];
    gmlFiles.forEach(file => {
      const content = fs.readFileSync(file, 'utf8');
      const fileErrors = runAllRules(file, content, config);
      allErrors = allErrors.concat(fileErrors);
    });

    handleLintResults(allErrors);
  } catch (error) {
    console.error(`Error scanning project files: ${error.message}`);
    process.exit(1);
  }
}