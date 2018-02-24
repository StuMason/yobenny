# YoBenny

### Deployment
- Use the mainline branch for development. Pushing to mainline sends to CodeShip.
- Codeship (StuMason/GoBenny - Artaten) runs through phpunit and dusk.
- Successful builds are put into the master branch and pushed to fortrabbit

### Development
#### Pre-commit message
vim .git/hooks/pre-commit
```
#!/bin/bash

while read -r file;
do
  file=${file:1}
  if [[ $file = *.php ]];
  then
    php-cs-fixer fix $file --rules=@PSR2
    git add $file
  fi
done < <(git diff --cached --name-status --diff-filter=ACM)
```