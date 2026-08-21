# Convenções de Git — Mapa Cultural AMFRI

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Modelo de branches

Seguimos [Git Flow](https://danielkummer.github.io/git-flow-cheatsheet/index.pt_BR.html):

- `develop` — desenvolvimento de novas funcionalidades e testes locais.
- `master` — ambiente de homologação.
- `feature/*` — funcionalidades pontuais (quando necessário).
- Tags `vMAJOR.MINOR.PATCH` — ambiente de produção.

## Versionamento semântico

[SemVer](https://semver.org/lang/pt-BR/):

- **PATCH** (`1.0.1`) — configurações, correções de bug, atualizações de patch de plugins/core/serviços.
- **MINOR** (`1.1.0`) — novas funcionalidades, novos plugins, mudança de minor do Mapas Culturais.
- **MAJOR** (`2.0.0`) — quebra de compatibilidade, mudança de major do Mapas Culturais.

## Submódulos

- Plugins de terceiros são submódulos em `plugins/`.
- Sempre execute `git submodule update --init --recursive` após pull/checkout.
- Prefira pinar submódulos a commits/tags estáveis.

## Commits e PRs

- Commits devem ser atômicos e descrever a intenção da mudança.
- Pull requests devem ser abertos para `develop`.
- Antes de merge, garanta que o build Docker e os testes relevantes passam.
