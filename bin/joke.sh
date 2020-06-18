#!/usr/bin/env bash
set -e

joke="$(curl -s -H "Accept: text/plain" https://icanhazdadjoke.com/)"

echo "$joke"