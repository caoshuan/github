# github
    application文件夹存放了controller，view，models文件，view是视图展示，controller用于转发（没有逻辑处理），models完成
所有的逻辑处理以及数据库的连接。
    fastphp主要存储class基类文件，包括数据库基类sql，登陆后的界面基类（head），以及controller基类，用于处理重复和常用的
逻辑判断和连接（如连接数据库）等。
    public文件夹存放了index.php文件以及需要调用的css样式文件
    config文件夹存放数据库连接所需的表名，数据库名，密码等。
    route.php是路由文件
