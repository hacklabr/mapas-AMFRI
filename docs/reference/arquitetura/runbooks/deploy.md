# Runbook — Deploy em produção

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Publicar uma nova versão do Mapa Cultural AMFRI em produção a partir de uma tag Git.

## Pré-condições

- [ ] Tag `v*.*.*` criada e pushada.
- [ ] CI de `.github/workflows/ci.yml` concluiu com sucesso e publicou a imagem `hacklab/mapas-amfri`.
- [ ] Acesso SSH ao servidor de produção.
- [ ] Backup do banco e arquivos recente disponível.

## Procedimento

1. Acesse o servidor de produção.
2. Navegue até o diretório do projeto.
3. Execute `git fetch --tags && git checkout vX.Y.Z`.
4. Execute `git submodule update --init --recursive`.
5. Execute `./update.sh` (pull, rebuild da imagem, restart dos containers).
6. Verifique se todos os containers estão saudáveis: `docker compose ps`.
7. Faça health check da aplicação (página inicial, login, uma funcionalidade crítica).
8. Monitore logs por 15 minutos: `./logs.sh`.

## Rollback deste runbook

1. Execute `git checkout vVERSAO_ANTERIOR`.
2. Execute `git submodule update --init --recursive`.
3. Execute `./update.sh` novamente.
4. Se necessário, restaure o banco a partir do backup mais recente.
