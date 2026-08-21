# ADR-0001 — Uso da imagem base `hacklab/mapasculturais:7.8.6`

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** setup

## Contexto

O repositório não mantém o código-fonte do core do Mapas Culturais. Para ter builds estáveis e atualizações controladas do core, é necessário uma imagem Docker base versionada.

## Decisão

Fixar a imagem base em `hacklab/mapasculturais:7.8.6` no `docker/Dockerfile`. Atualizações de core exigem mudança explícita nesse arquivo (e consequente ajuste em `update.sh`).

## Consequências

- **Positivas:** builds reproduzíveis; upgrades deliberados e rastreáveis.
- **Negativas:** o repo fica dependente do ciclo de releases da imagem base; correções urgentes de core dependem de nova tag publicada pela equipe do Mapas Culturais.
