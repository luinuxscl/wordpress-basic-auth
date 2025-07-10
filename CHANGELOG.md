# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Initial implementation of WordPress Basic Auth package for Laravel
- Commands for storing and verifying WordPress credentials
- Livewire component for creating WordPress credentials
- Service for interacting with WordPress posts
- Command to list sites with stored credentials
- Connection status verification for WordPress credentials
- Installation command and translations

### Changed
- Improved Livewire component registration
- Refactored connection verification in PingWordpressCommand and WordpressService
- Updated PHP version requirement to ^8.2

### Fixed
- Fixed component registration in CreateWordpressCredential and WordpressBasicAuthServiceProvider

## [1.0.0] - 2025-07-09

### Added
- First stable release
- Complete documentation
- Automated testing setup
- GitHub Actions workflow for CI/CD

### Changed
- Updated all dependencies to their latest stable versions
- Improved code organization and documentation

### Security
- Implemented secure credential storage
- Added input validation for all user inputs
