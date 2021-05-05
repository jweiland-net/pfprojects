#
# Table structure for table 'tx_pfprojects_domain_model_project'
#
CREATE TABLE tx_pfprojects_domain_model_project
(
  title                varchar(255)        DEFAULT ''           NOT NULL,
  path_segment         varchar(2048)       DEFAULT ''           NOT NULL,
  start_date           date                DEFAULT '1000-01-01' NOT NULL,
  status               varchar(10)         DEFAULT ''           NOT NULL,
  contact_person       varchar(255)        DEFAULT ''           NOT NULL,
  telephone            varchar(255)        DEFAULT ''           NOT NULL,
  email                varchar(255)        DEFAULT ''           NOT NULL,
  office_type          tinyint(1) unsigned DEFAULT '0'          NOT NULL,
  organisationseinheit int(11) unsigned    DEFAULT '0'          NOT NULL,
  office_manuell       varchar(255)        DEFAULT ''           NOT NULL,
  images               int(11) unsigned    DEFAULT '0'          NOT NULL,
  description          text                                     NOT NULL,
  files                int(11) unsigned    DEFAULT '0'          NOT NULL,
  links                int(11) unsigned                         NOT NULL default '0'
);

#
# Table structure for table 'tx_pfprojects_domain_model_link'
#
CREATE TABLE tx_pfprojects_domain_model_link
(
  title            varchar(255)        DEFAULT ''  NOT NULL,
  link             varchar(255)        DEFAULT ''  NOT NULL,
  project          int(11)             DEFAULT '0' NOT NULL
);
