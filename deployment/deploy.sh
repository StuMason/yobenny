#!/usr/bin/env bash
dt=$(date '+%d/%m/%Y %H:%M:%S');
git checkout -b yobenny
git remote add fortrabbit yobenny@deploy.eu2.frbit.com:yobenny.git
git add .
git commit -m "deployment - $dt"
git push fortrabbit yobenny