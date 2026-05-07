# TODO.md

## Database migrations

Provide a UI for running database migrations. One HTTP request per migration file.

- Show size of dataset. Explain reduction.
- Show errors.
- Show WP CLI command.
- Rest API, nonce, capability check.
- New installs: skip straight to correct DB structure?

_Note (Danny): I do not think we need this right now, but whenever we introduce any expensive database changes in the future, we should include this._