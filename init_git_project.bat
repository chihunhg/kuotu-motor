@echo off
cd /d T:\wamp64\www\kuotu-motor\web_p

echo Initializing Git project...
git init

echo Creating .gitignore file...
echo /vendor/ > .gitignore
echo /node_modules/ >> .gitignore
echo *.log >> .gitignore
echo .env >> .gitignore
echo .DS_Store >> .gitignore
echo Thumbs.db >> .gitignore

echo Committing initial files...
git add .
git commit -m "Initial commit: kuotu-motor project"

echo Done!
echo ----------------------------------------------------
echo Now go to GitHub and create a new repository, then run:
echo git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
echo git push -u origin main
echo ----------------------------------------------------
pause
