#!/bin/bash
echo "[1/3] Installing composer packages..."
composer install

echo "[2/3] Running Psalm static analysis..."
vendor/bin/psalm > scan-result/psalm-report.txt

echo "[3/3] Running PHP CodeSniffer..."
vendor/bin/phpcs --report=full --standard=phpcs.xml . > scan-result/phpcs-report.txt

echo "All scan complete! Reports are in the scan-result folder."
