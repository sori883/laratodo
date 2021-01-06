---
weight: 1
bookFlatSection: true
title: "機能一覧"
---

# 機能一覧
テスト項目等に起こせるよう、一覧で掲載

## タスク関連
1. タスク作成
    - タイトル50文字
    ‐ 日付はY/m/d H:i形式でNULL許可
    - プロジェクトはNULL許可
1. タスクはタイトル、期限日、状態を持つ
1. タスクの状態は非完了、完了の2種類
1. タスクを一覧表示
1. タスクはタイトル、期限日、状態を編集出来る
    - タイトル50文字
    ‐ 日付はY/m/d H:i形式でNULL許可
    - プロジェクトはNULL許可
1. タスクは削除出来る
    - SoftDeletesを使用して論理削除
1. タスクはプロジェクトに分類して管理する
1. ユーザは自分のタスクのみ閲覧可能

## プロジェクト関連
1. ユーザはプロジェクトを作成することが出来る
    ‐ タイトル20文字以内
1. プロジェクト名を編集出来る
    ‐ タイトル20文字以内
1. プロジェクトは削除出来る
    - SoftDeletesを使用して論理削除
1. プロジェクトに所属していないタスクはinboxに格納される
    - project_idがNULLの場合、inboxと判定
1. プロジェクトの一覧表示
1. ユーザは自分のプロジェクトのみを閲覧可能

## ログイン関連
1. ユーザごとにアカウントを持つ
    - ユーザ名は英数字3~255文字以内で重複不可
    - メールはメールアドレス形式で重複不可
    - パスワードは8文字以上
1. ユーザはパスワードを忘れた場合には再登録することが出来る