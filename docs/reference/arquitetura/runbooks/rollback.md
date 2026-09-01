# Runbook — Rollback de deploy

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Reverter o ambiente de produção para uma versão anterior estável após um deploy com regressão.

## Pré-condições

- [ ] Identificada a tag anterior estável (`vX.Y.Z-1`).
- [ ] Backup do banco e arquivos disponível (caso a regressão tenha alterado dados).
- [ ] Acesso SSH ao servidor de produção.

## Procedimento

1. Notifique a equipe no canal de incidentes.
2. Pare o tráfego para a aplicação (se possível, no proxy/ingress).
3. No servidor, faça checkout da tag anterior: `git checkout vX.Y.Z-1`.
4. Atualize submódulos: `git submodule update --init --recursive`.
5. Execute `./update.sh`.
6. Verifique se a aplicação voltou ao estado esperado.
7. Se houver corrupção de dados, restaure o banco do backup mais recente.
8. Reabra o tráfego.
9. Abra uma issue `doc-bug`/`product-feedback` para investigar a regressão.

## Rollback deste runbook

- Refaça o deploy da tag mais recente após a correção.
