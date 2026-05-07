# AGENTS.md

Repo-specific guidance for agents working in `koko-analytics`.

## Working Rules

- Do not revert unrelated user changes.
- Prefer the smallest correct change.
- Treat `assets/js/src/*.js` as source; `assets/js/*.js` is generated and must be rebuilt with `npm run build`.
- After code changes, run the relevant validation commands before reporting completion.
- If validation fails, fix it and rerun, or clearly report the failure.

## Validation

Use the narrowest useful checks first.

- PHP syntax: `composer check-syntax`
- PHP static analysis: `composer static-analysis`
- PHP code style: `composer check-codestyle`
- PHPUnit: `composer test`
- Full suite: `composer check-all`
- JS lint/build: `npm run lint && npm run build`

## What To Run

- Small PHP edit: `composer check-syntax` and `composer static-analysis`
- PHP formatting-sensitive edit: also run `composer check-codestyle`
- PHP behavior change: also run the relevant PHPUnit test or `composer test`
- Broad backend change: prefer `composer check-all`
- JS source change: `npm run lint && npm run build`

## Project Notes

- Frontend tracking source is `assets/js/src/`; built output is `assets/js/`.
- `assets/js/script.js` is printed inline from `src/Script_Loader.php`.
- `bin/check-php-syntax` skips `vendor/` and `node_modules/`.

- If built assets are committed, include both source and rebuilt output.