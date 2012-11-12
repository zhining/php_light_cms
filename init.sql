/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2012/11/10 21:02:55                          */
/*==============================================================*/


drop table if exists acl;

drop table if exists category;

drop table if exists comments;

drop table if exists post;

drop table if exists user;

/*==============================================================*/
/* Table: acl                                                   */
/*==============================================================*/
create table acl
(
   acl_id               int not null auto_increment,
   user_id              int not null comment '用户ID',
   primary key (acl_id)
)ENGINE=Myisam DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table: category                                              */
/*==============================================================*/
create table category
(
   category_id          int not null auto_increment comment '分类ID',
   cat_category_id      int comment '父分类ID',
   type                 varchar(20),
   name                 varchar(128) comment '分类名称',
   alias                varchar(128) comment '分类别名',
   rank                 int(5) comment '分类等级',
   primary key (category_id)
)ENGINE=Myisam DEFAULT CHARSET=utf8;

alter table category comment '分类表，可用于文章分类';

/*==============================================================*/
/* Table: comments                                              */
/*==============================================================*/
create table comments
(
   comment_id           int not null auto_increment comment '评论ID',
   parent_comment_id    int comment '父评论ID',
   post_id              int not null comment '文章ID',
   user_id              int not null comment '用户ID',
   title                varchar(128) comment '评论标题',
   body                 text comment '评论内容',
   created              datetime comment '创建时间',
   modified             datetime comment '修改时间',
   status               varchar(20) comment '状态（publish显示，draft不显示）',
   primary key (comment_id)
)ENGINE=Myisam DEFAULT CHARSET=utf8;

alter table comments comment '树状节点的评论表';

/*==============================================================*/
/* Table: post                                                  */
/*==============================================================*/
create table post
(
   post_id              int not null auto_increment comment '文章ID',
   user_id              int not null comment '用户ID',
   category_id          int not null comment '分类ID',
   title                varchar(255) comment '文章标题',
   excerpt              varchar(255) comment '文章摘录',
   body                 text comment '文章主体',
   status               varchar(20) comment 'publish 发布，draft 草稿即不发布',
   rank                 int(5) comment '文章等级排名',
   created              datetime comment '文章创建时间',
   modified             datetime comment '修改时间',
   primary key (post_id)
)ENGINE=Myisam DEFAULT CHARSET=utf8;

alter table post comment '文章表';

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   user_id              int not null auto_increment comment '用户ID',
   username             varchar(128) comment '用户名',
   password             varchar(128) comment '用户密码',
   email                varchar(128) comment '电子邮件',
   url                  varchar(128) comment '个人主页',
   created              datetime comment '创建时间',
   status               varchar(20) comment '状态（active激活，unactive未激活）',
   primary key (user_id)
)ENGINE=Myisam DEFAULT CHARSET=utf8;

alter table user comment '用户表，记录用户的数据';

alter table acl add constraint FK_FK_USER_ACL foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

alter table category add constraint FK_CATEGORY_ITSELF foreign key (cat_category_id)
      references category (category_id) on delete restrict on update restrict;

alter table comments add constraint FK_COMMENT_ITSELF foreign key (parent_comment_id)
      references comments (comment_id) on delete restrict on update restrict;

alter table comments add constraint FK_FK_POST_COMMENT foreign key (post_id)
      references post (post_id) on delete restrict on update restrict;

alter table comments add constraint FK_PK_USER_COMMENT foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

alter table post add constraint FK_FK_CATEGORY_POST foreign key (category_id)
      references category (category_id) on delete restrict on update restrict;

alter table post add constraint FK_FK_POST_USER foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

