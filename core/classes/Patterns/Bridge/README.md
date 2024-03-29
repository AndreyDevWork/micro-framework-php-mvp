### Паттерн Мост особенно полезен когда вам:

*     - приходится поддерживать несколько типов баз данных или 
*     - работать с разными поставщиками похожего API (например, cloud-сервисы, социальные сети и т. д.)

### Признаки применения паттерна:

1. Если в программе чётко выделены классы «управления» и несколько видов классов «платформ», причём управляющие объекты
   делегируют выполнение платформам, то можно сказать, что у вас используется Мост.

### Паттерн

1. Разделяет бизнес-логику или большой класс на несколько отдельных иерархий, которые потом можно развивать отдельно
   друг от друга.
2. Одна из этих иерархий (абстракция) получит ссылку на объекты другой иерархии (реализация) и будет делегировать им
   основную работу
3. Благодаря тому, что все реализации будут следовать общему интерфейсу, их можно будет взаимозаменять внутри
   абстракции.