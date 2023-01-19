# Test TYPO3 main-branch in composer mode

## Path customization

This implies that the TYPO3 git-source have been
installed to a folder named `TYPO3.CMS`.

You can adapt the path as follows:


```sh
git grep -l TYPO3.CMS | xargs sed -i 's/TYPO3.CMS/typo3-source/g'
```

This example changes the path to `typo3-source`,
you'd basically use the name of your TYPO3 core folder and place
this repository next to it.

## Installation example

```sh
git clone https://github.com/TYPO3/typo3 TYPO3.CMS
git clone https://github.com/bnf/typo3-main-composer-mode 
cd typo3-main-composer-mode
ddev start
ddev composer install
ddev launch
```

(only useful if you do not have TYPO3-source cloned yet, but those
commands should clarify where you'd checkout this directory.)
