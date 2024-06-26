### Медиатор — это поведенческий паттерн проектирования, который позволяет уменьшить связанность множества классов между собой, благодаря перемещению этих связей в один класс-посредник.

1. Паттерн Посредник заставляет объекты общаться не напрямую друг с другом, а через отдельный объект-посредник, который знает, кому нужно перенаправить тот или иной запрос. Благодаря этому, компоненты системы будут зависеть только от посредника, а не от десятков других компонентов.
1. Таким образом, посредник скрывает в себе все сложные связи и зависимости между классами отдельных компонентов программы. А чем меньше связей имеют классы, тем проще их изменять, расширять и повторно использовать.

### Признаки применения паттерна:

1. Когда вам сложно менять некоторые классы из-за того, что они имеют множество хаотичных связей с другими классами.
2. Когда вы не можете повторно использовать класс, поскольку он зависит от уймы других классов.
3. Когда вам приходится создавать множество подклассов компонентов, чтобы использовать одни и те же компоненты в разных контекстах.

#### Преимущества
1. Устраняет зависимости между компонентами, позволяя повторно их использовать.
2. Упрощает взаимодействие между компонентами.
3. Централизует управление в одном месте.

#### Недостастатки
1. Посредник может сильно раздуться.
