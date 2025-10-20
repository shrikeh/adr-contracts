# Local Development

## Requirements

This documentation is biased towards Macbook setup with [Homebrew][brew]. However, the same can be achieved with a little tweaking to work on Linux and Windows.

* Homebrew

A `Brewfile` is supplied that will install prerequisites.

## TLDR; One liner to kickstart

```bash
brew bundle install && cp .dev/env/.envrc ./ && mise trust && direnv allow;
```


[brew]: https://brew.sh
