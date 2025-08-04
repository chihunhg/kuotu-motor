@echo off
cd /d %~dp0

if not exist scan-result (
    mkdir scan-result
)

echo [1/3] Installing composer packages...
call composer install

echo [2/3] Running Psalm static analysis...
set TERM=dumb
call vendor\bin\psalm --no-progress > scan-result\psalm-report.txt

echo [3/3] Running PHP CodeSniffer...
call vendor\bin\phpcs --report=full --standard=phpcs.xml . > scan-result\phpcs-report.txt

echo.
echo ✅ 所有掃描完成！請查看 scan-result 資料夾中的報告。
pause