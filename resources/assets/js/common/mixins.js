/*
 * Copyright (c) Jake Toolson 2018.
 */

export const filters = {
    filters: {
        truncate : (text, stop, clamp) => {
            return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
        }
    },
};