# ADR-0005 — Publicação da imagem de deploy no Docker Hub via CI

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** setup

## Contexto

Produção precisa de um artefato único, versionado e reproduzível para deploy, evitando build manual no servidor.

## Decisão

GitHub Actions em `.github/workflows/ci.yml` builda e publica `docker.io/hacklab/mapas-amfri` a cada tag `v*.*.*` e branches `master`/`develop`, gerando tags SemVer conforme `docker/metadata-action`.

## Consequências

- **Positivas:** deploy previsível baseado em imagem; promoção padronizada entre ambientes; histórico de builds vinculado a tags Git.
- **Negativas:** dependência de credenciais do Docker Hub (`DOCKERHUB_USERNAME` / `DOCKERHUB_TOKEN`); build falha se submódulos não estiverem atualizados ou se a imagem base não estiver disponível.
