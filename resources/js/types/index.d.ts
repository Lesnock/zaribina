export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};

export interface Option {
    id?: number;
    name: string;
    values: OptionValue[];
}

export interface OptionValue {
    id?: number;
    option_id?: number;
    name: string;
}
