# Laravel Tic-Toc-Toe API

A simple implementation of Tic-Toc-Toe via API in Laravel

### newgame

endpoint: /api/newgame

method: post

params: void (no param)

return: game_id (json)

### play

endpoint: /api/play

method: post

params:
- game_id (returned by /newgame)
- player: (1, 2)
- position: (a1, a2, a3, b1, b2, b3, c1, c2, c3)

return: gameturn status details (json) 
