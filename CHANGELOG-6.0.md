# Changelog - Version 6.0

## Overview

Version 6.0 brings significant improvements to the Singleton Pattern library, including updated PHP version requirements, comprehensive documentation, improved tooling support, and enhanced GitHub Actions workflows.

## New Features

### Comprehensive Documentation Structure
- Added detailed markdown-based documentation in the `docs/` folder
- **Getting Started Guide** (`docs/getting-started.md`) - Installation and requirements
- **Creating a Singleton Class** (`docs/creating-singleton.md`) - Step-by-step implementation guide
- **Using Your Singleton** (`docs/using-singleton.md`) - Working with singleton instances
- **How It Works** (`docs/how-it-works.md`) - Implementation details and internals
- **API Reference** (`docs/api-reference.md`) - Complete API documentation
- Updated `README.md` with links to the new documentation structure

### Enhanced Development Environment
- Added Gitpod configuration (`.gitpod.yml`) for cloud-based development
- Added VSCode launch configuration (`.vscode/launch.json`) for debugging support
- Added Composer scripts for easier testing and analysis:
  - `composer test` - Run PHPUnit tests
  - `composer psalm` - Run Psalm static analysis

### Improved CI/CD Workflows
- Enhanced GitHub Actions workflow with better container options
- Added separate Psalm static analysis job with SARIF upload for security insights
- Updated to use latest `actions/checkout` action
- Added PHP 8.4 and PHP 8.5 to test matrix

### Stability Configuration
- Added `minimum-stability: dev` with `prefer-stable: true` in `composer.json` for better dependency resolution

## Breaking Changes

| Aspect | Before (5.x) | After (6.x) | Description |
|--------|-------------|------------|-------------|
| **Minimum PHP Version** | PHP 8.1 | PHP 8.3 | Dropped support for PHP 8.1 and 8.2 |
| **Maximum PHP Version** | PHP <8.4 | PHP <8.6 | Added support for PHP 8.4 and 8.5 |
| **PHPUnit Version** | ^9.6 | ^10.5\|^11.5 | Updated to support PHPUnit 10 and 11 |
| **Psalm Version** | ^5.9 | ^5.9\|^6.13 | Added support for Psalm 6 |

## Path to Upgrade from 5.x to 6.x

### Prerequisites Check

1. **Verify PHP Version**
   ```bash
   php -v
   ```
   Ensure you are running PHP 8.3, 8.4, or 8.5. If you're on PHP 8.1 or 8.2, you must upgrade your PHP version before updating to version 6.0.

### Upgrade Steps

2. **Update Composer Dependency**
   ```bash
   composer require "byjg/singleton-pattern:^6.0"
   ```

3. **Update Development Dependencies** (if applicable)

   If your project uses PHPUnit or Psalm and references the same versions, you may need to update them:
   ```bash
   composer update --with-dependencies
   ```

4. **Run Tests**

   Verify your implementation works correctly:
   ```bash
   composer test
   # or
   vendor/bin/phpunit
   ```

5. **Review Documentation**

   Check the new comprehensive documentation for best practices and implementation details:
   - [Getting Started](docs/getting-started.md)
   - [Creating a Singleton Class](docs/creating-singleton.md)
   - [Using Your Singleton](docs/using-singleton.md)

### Code Changes Required

**No code changes are required** in your implementation. The Singleton trait API remains fully backward compatible. The only changes are:

- PHP version requirement (upgrade your environment if needed)
- Development dependencies versions (only affects contributors/developers)

### Compatibility Notes

- All singleton implementations using the trait will continue to work without modification
- The `getInstance()` method signature remains unchanged
- Clone, serialize, and unserialize protections remain the same
- Constructor requirements (private/protected) remain unchanged

### Troubleshooting

If you encounter issues after upgrading:

1. **Clear Composer cache:**
   ```bash
   composer clear-cache
   composer install
   ```

2. **Verify PHP version compatibility:**
   ```bash
   composer check-platform-reqs
   ```

3. **Review the comprehensive documentation** in the `docs/` folder for implementation guidance

## Additional Changes

- Updated `psalm.xml` configuration to adjust error level and exclude test directory
- Added sponsor badge to README
- Improved PHPUnit configuration (`phpunit.xml.dist`)
- Updated GitHub workflow to use Composer scripts for Psalm analysis
- Added sample test file (`tests/Sample2.php`) for expanded test coverage
- Removed deprecated `_config.yml` file

## Migration Timeline

- **Version 5.x** remains available for projects using PHP 8.1-8.2
- **Version 6.x** is recommended for all projects using PHP 8.3+
- No end-of-life date has been announced for 5.x at this time

## Support

For issues, questions, or contributions:
- GitHub Issues: https://github.com/byjg/php-singleton-pattern/issues
- Documentation: [docs/getting-started.md](docs/getting-started.md)
- Sponsor: https://github.com/sponsors/byjg
