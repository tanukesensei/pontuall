CREATE TABLE processes (
    id serial NOT NULL,
    num_process character varying NOT NULL,
    id_expert integer NOT NULL,
    labour_stick character varying NOT NULL,
    name_claimed character varying NOT NULL,
    claimants_name character varying NOT NULL,
    worked_hours integer NOT NULL,
    date_distribution date NOT NULL,
    admission_date date NOT NULL,
    resignation_date date default NULL,
    prescription_date date default NULL,
    type_process character varying NOT NULL,
    weekly_break character varying NOT NULL,
    monthly_breakdown character varying NOT NULL,
    calculation_period integer NOT NULL,

    primary key(id),
    foreign key(id_expert) references users (id) on delete cascade on update cascade
);
