<?php

return [

    'apiSecret' => 'Q56#!25753!sah4+2Y/nspq#akto?ash#28',
    'regular' => '{"code":10000,"message":"成功","data":{"siteRegConfiglList":[{"id":"1031885161560641538","siteId":"1031885064860962817","siteCode":"vjoptr-0","siteTitle":"凤凰彩票","fieldName":"邀请码","fieldCode":"inviter","regexRule":"","isDisplay":1,"isRequired":1,"isVerify":1,"isDel":0,"remark":"","createBy":"admin01","createTime":"2018-08-21 20:46:09","updateBy":"jppt02","updateTime":"2019-09-12 04:52:12","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1031885161623556098","siteId":"1031885064860962817","siteCode":"vjoptr-0","siteTitle":"凤凰彩票","fieldName":"真实姓名","fieldCode":"realName","regexRule":"","isDisplay":1,"isRequired":1,"isVerify":0,"isDel":0,"remark":"","createBy":"admin01","createTime":"2018-08-21 20:46:09","updateBy":"jppt02","updateTime":"2019-09-12 04:52:12","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1031885161694859266","siteId":"1031885064860962817","siteCode":"vjoptr-0","siteTitle":"凤凰彩票","fieldName":"手机号码","fieldCode":"mobile","regexRule":"","isDisplay":1,"isRequired":1,"isVerify":1,"isDel":0,"remark":"","createBy":"admin01","createTime":"2018-08-21 20:46:09","updateBy":"jppt02","updateTime":"2019-09-12 04:52:12","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1031885161749385217","siteId":"1031885064860962817","siteCode":"vjoptr-0","siteTitle":"凤凰彩票","fieldName":"昵称","fieldCode":"nc","regexRule":"","isDisplay":1,"isRequired":1,"isVerify":1,"isDel":0,"remark":"","createBy":"admin01","createTime":"2018-08-21 20:46:09","updateBy":"jppt02","updateTime":"2019-09-12 04:52:12","orderField":"id","orderDirection":"desc","page":1,"limit":20}],"referCode":"","validateCode":false,"regexKeyValueList":[{"id":"1036788566091956225","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"nc","dictValue":"昵称 由3 ~ 12 位字符的汉字、字母、数字、下划线组成，一个汉字占两个字符","isEnable":1,"remark":"^[\\\\u4e00-\\\\u9fa5_a-zA-Z0-9]*$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036789838975139842","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"realName","dictValue":"至少输入两个汉字，不能输入字母或数字","isEnable":1,"remark":"^(?!.*(·)\\\\1)([\\\\u4e00-\\\\u9fa5][\\\\u4e00-\\\\u9fa5·]{0,18}[\\\\u4e00-\\\\u9fa5]|)$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036790212050092034","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"email","dictValue":"请输入正确的邮箱, 如 123@qq.com","isEnable":1,"remark":"^[A-Za-z0-9_-\\\\u4e00-\\\\u9fa5]+@[a-zA-Z0-9_-]+(\\\\.(com|com.cn|net|msn.cn))+$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036790377511190530","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"mobile","dictValue":"手机号码必须是数字11位数，且有效号码","isEnable":1,"remark":"^1\\\\d{10}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036790806739484673","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"agent","dictValue":"代理人","isEnable":1,"remark":"^[\\\\u4e00-\\\\u9fa5a-zA-Z]{2,20}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036791010343583745","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"country","dictValue":"国家","isEnable":1,"remark":".*","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036791376695066626","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"inviter","dictValue":"邀请码必填才可注册","isEnable":1,"remark":"^[a-zA-Z0-9]{6}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036791697475436546","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"payPassword","dictValue":"支付密码 由4位纯数字组成","isEnable":1,"remark":"^\\\\d{4}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036791946986192897","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"contact","dictValue":" \t联系人,由汉字,字母组成","isEnable":1,"remark":"^[\\\\u4e00-\\\\u9fa5a-zA-Z]{2,20}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036792127584534530","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"cartNo","dictValue":"请输入正确得身份证号","isEnable":1,"remark":"^\\\\d{6}(18|19|20)?\\\\d{2}(0[1-9]|1[12])(0[1-9]|[12]\\\\d|3[01])\\\\d{3}(\\\\d|X|x)$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036792356874551297","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"qq","dictValue":" \tqq号码由4-11位数字组成","isEnable":1,"remark":"^\\\\d{4,11}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036792659376144386","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"currency","dictValue":"币种","isEnable":1,"remark":".*","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036792885759508481","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"birthDate","dictValue":"请选择您的出生年月","isEnable":1,"remark":"^((?:19|20)\\\\d\\\\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036793150545920002","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"weChat","dictValue":"微信由6-20个字母数字、下划线或减号组成","isEnable":1,"remark":"^[-_a-zA-Z0-9]{6,20}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036813873283870721","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"passWord","dictValue":"密码由6~20位数字+字母、特殊字符组成，且不能为纯数字、字母、特殊字符","isEnable":1,"remark":"^(?![\\\\d]+$)(?![a-zA-Z]+$)(?![^\\\\da-zA-Z]+$).{6,20}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036814153309290497","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"passWord","dictValue":"密码由6~20位数字+字母、特殊字符组成，且不能为纯数字、字母、特殊字符","isEnable":1,"remark":"^(?![\\\\d]+$)(?![a-zA-Z]+$)(?![^\\\\da-zA-Z]+$).{6,20}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036827451777941505","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"userName","dictValue":"用户名由6~16位字母、数字、下划线组成，且第一位不能是下划线","isEnable":1,"remark":"^[a-zA-Z0-9][a-zA-Z0-9_]{5,15}$","orderField":"id","orderDirection":"desc","page":1,"limit":20},{"id":"1036871817175302146","dictCode":"REGEX_RULE","dictName":"正则规则","dictKey":"address","dictValue":" \t家庭住址由2-150位汉字字母数字组成","isEnable":1,"remark":"^[\\\\u4e00-\\u9fa5a-zA-Z\\\\d]{2,150}$","orderField":"id","orderDirection":"desc","page":1,"limit":20}]}}'


];