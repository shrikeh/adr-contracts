#!/usr/bin/env bash
set -euo pipefail

function check_composer_auth_token() {
  declare TEMPLATE='auth.json.tmpl';
  declare PROJECT_ROOT="${1}";
  declare AUTH_FILE="${2:-auth.json}";
  declare AUTH_FILE_PATH="${PROJECT_ROOT}/${AUTH_FILE}";

    if [ ! -n "${GITHUB_TOKEN:-}" ]; then
      printf "No github token found in variable \$GITHUB_TOKEN. Please enter it now:\n";
      read -rsp "Token: " GITHUB_TOKEN;

    fi

    if [ ! -f "${AUTH_FILE_PATH}" ]; then
      # Create a local auth file for now
      docker compose run --remove-orphans --quiet --rm \
        -e GITHUB_TOKEN="${GITHUB_TOKEN}" gomplate \
        --file "/templates/${TEMPLATE}" --out "/output/${AUTH_FILE}";
    fi

  COMPOSER_AUTH="$(jq -c . < ${AUTH_FILE_PATH})"

  docker compose run --quiet --remove-orphans --rm \
    -e COMPOSER_AUTH="${COMPOSER_AUTH}" \
    -e GITHUB_TOKEN="${GITHUB_TOKEN}" \
    gomplate --file "/templates/.env.auth.tmpl" --out "/output/.env.auth";

  return 0;
}

check_composer_auth_token "${PWD}";
