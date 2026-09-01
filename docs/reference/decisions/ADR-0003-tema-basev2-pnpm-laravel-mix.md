# ADR-0003 — Tema filho BaseV2 com build de assets via pnpm/Laravel Mix

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** setup

## Contexto

A AMFRI precisa de identidade visual própria sem forkar o core do Mapas Culturais. O tema deve reaproveitar o design system existente e compilar assets automaticamente durante o build da imagem.

## Decisão

`themes/MapasAmfri/Theme.php` estende `MapasCulturais\Themes\BaseV2\Theme`. Os assets são compilados com `pnpm install --recursive && pnpm run build`, usando o workspace `@mapas/scripts` e a configuração compartilhada do Laravel Mix em `node_modules/@mapas/scripts/webpack.mix.js`.

## Consequências

- **Positivas:** reaproveitamento do design system do core; padronização do pipeline de front-end.
- **Negativas:** aumenta o tempo de build da imagem; exige Node/pnpm no pipeline de CI; alterações na API de `@mapas/scripts` podem quebrar o build do tema.
