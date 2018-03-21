#!/usr/bin/env bash
dt=$(date '+%d/%m/%Y %H:%M:%S');
git remote add fortrabbit yobenny@deploy.eu2.frbit.com:yobenny.git
git checkout -b yobenny
git add .
git commit -m "mainline deployment $dt"
git push fortrabbit yobenny