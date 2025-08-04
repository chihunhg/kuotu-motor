@echo off
cd /d T:\wamp64\www\kuotu-motor\web_p

:: 安全取得 Git user.name
for /f "tokens=* delims=" %%A in ('git config --global user.name 2^>nul') do set GIT_USERNAME=%%A
for /f "tokens=* delims=" %%B in ('git config --global user.email 2^>nul') do set GIT_EMAIL=%%B

if "%GIT_USERNAME%"=="" (
    echo [Git 設定] 尚未設定 user.name
    set /p GIT_USERNAME=請輸入 Git user.name（如：James Lin）:
    git config --global user.name "%GIT_USERNAME%"
)

if "%GIT_EMAIL%"=="" (
    echo [Git 設定] 尚未設定 user.email
    set /p GIT_EMAIL=請輸入 Git user.email（如：james@example.com）:
    git config --global user.email "%GIT_EMAIL%"
)

echo 檢查是否存在 index.lock...
IF EXIST .git\index.lock (
    echo index.lock 已存在，自動刪除中...
    del /f /q .git\index.lock
)

echo 初始化 Git 專案中...
git init

echo 建立 .gitignore 檔案...
echo /vendor/ > .gitignore
echo /node_modules/ >> .gitignore
echo *.log >> .gitignore
echo .env >> .gitignore
echo .DS_Store >> .gitignore
echo Thumbs.db >> .gitignore

echo 建立初次 Commit...
git add .
git commit -m "Initial commit: kuotu-motor project"

echo ----------------------------------------------------
echo ? Git 初始化完成
echo 請至 GitHub 建立新 repository，並輸入以下指令：
echo git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
echo git push -u origin main
echo ----------------------------------------------------
pause
