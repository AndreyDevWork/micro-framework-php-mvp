## Шаблонный метод

1. Шаблонный метод — это поведенческий паттерн, задающий скелет алгоритма в суперклассе и заставляющий подклассы
   реализовать конкретные шаги этого алгоритма.
2. Паттерн Шаблонный метод предлагает разбить алгоритм на последовательность шагов, описать эти шаги в отдельных методах
   и вызывать их в одном шаблонном методе друг за другом.

Это позволит подклассам переопределять некоторые шаги алгоритма, оставляя без изменений его структуру и остальные шаги,
которые для этого подкласса не так важны.

#### Плюсы

- Облегчает повторное использование кода.

#### Минусы

- Вы жёстко ограничены скелетом существующего алгоритма.
- Вы можете нарушить принцип подстановки Барбары Лисков, изменяя базовое поведение одного из шагов алгоритма через
  подкласс.
- С ростом количества шагов шаблонный метод становится слишком сложно поддерживать.
