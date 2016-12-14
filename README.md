# IW32 Team Project

IW32でのチーム制作

**注意**
ローカル環境にdownload又はcloneする際は、ダウンロードしたフォルダ名を
**IW32_Team_Project** に変更する！

## .sqlファイルについて
このプロジェクトで使用するDBを作成する為に使用する。

### 読み込む順番
1. create_user.sql
2. IW32_Team.sql

### ファイルの説明
* create_user.sql
 * DBの作成
 * Userの作成
 * 権限の付与

* IW32_Team.sql
 * テーブルの作成
 * サンプルデータの作成
 * 制約の付与


## PHPのコーデング規約

### クラス定数
全て大文字で、区切り文字はアンダースコアで記述。

### プロパティ
クラス定数と同じく、アンダースコア記法で記述。

### メソッド
* camelCase記法で記述する。
* 全てのメソッドにアクセス権を設定

### インデント
半角スペース２個のTab


### メソッド、関数呼び出し
* メソッド、関数呼び出し時は、開きカッコ ( の前にスペースを記述してはいけない。
* 開きカッコ ( の後ろ、閉じカッコ ) の前にもスペースを記述してはいけない。
* 引数の前にスペースw記述をしてはいけない。
* 各カンマの後ろにスペースを1つ記述する。
* 引数は、インデントにより揃える事で複数行に記述してもよい。その場合は、最初の記述も次の行からはじめて1行に1つの引数を記述する。

### if, elseif, else
* ifの後ろにスペースを記述する。
* elseif, elseの前後にスペースを記述する。
* 開きカッコ { , 閉じカッコ } は、if, elseif, elseと同じ行に記述する。
* 最後のとじカッコは本文の最後の次の行に記述する。

### switch case
* switch, caseの後ろにスペースを1つあける。
* case文はswitch文からインデントする。
* breakはcase文の中の本文と同じインデントで記述する。
* 意図的にbreakを記述せずに処理をスルーさせる場合は、「//no break」のようにコメントを記述する。
* 最後の閉じカッコは本文の最後の次の行に記述する。

### while, do while
* whileの後ろにスペースを1つ記述。
* 開きカッコはwhileと同じ行に記述。
* doの後ろにスペースを1つ記述。
* do-whileの場合、whileの前後にスペースを1つ記述。
* 最後のとじカッコは本文の次の行に記述。

### for, foreach
* for, foreachの後ろに1つスペースを記述。
* (forの場合)セミコロンの後ろは1つスペースを記述。
* 開きカッコ { はforと同じ行に記述。
* 最後の閉じカッコは本文の最後の次の行に記述。

### try, catch
* tryの後ろに1つスペースを記述。
* catchの前後に1つスペースを記述。
* try,catchと同じ行に開きカッコ、閉じカッコは記述。
* 最後の閉じカッコは本文の最後の行に記述。

### その他
* コメントはできるだけ記述
* 改行を良い感じで取って、見やすく
* ヘッダコメントを記述



### ヘッダコメントのテンプレート
```php
<?php
/**
 * 説明
 *
 * @author HIR0Y0SHI
 * @version 1.0
 * Created: 2016/12/11
 */
```


### メソッドコメントのテンプレート
```php
/**
* 説明
*
* Created by HIROYOSHI on 2016/12/14
*
* @param string $arg 第一引数
* @param integer $arg2 第二引数
* @return array 戻り値の説明
*/
```
