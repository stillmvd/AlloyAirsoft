import {
    SET_DATE_GAME, SET_LINK_GOOGLE_GAME, SET_LINK_IFRAME_GAME,
    SET_NAME_GAME, SET_TIME_GAME
} from '../store/actionType'

export const setNameGame = (name) => ({
    type: SET_NAME_GAME,
    payload: name,
});

export const setDateGame = (date) => ({
    type: SET_DATE_GAME,
    payload: date,
});

export const setTimeGame = (time) => ({
    type: SET_TIME_GAME,
    payload: time,
});

export const setLinkGoogleGame = (link) => ({
    type: SET_LINK_GOOGLE_GAME,
    payload: link,
});

export const setLinkIframeGame = (link) => ({
    type: SET_LINK_IFRAME_GAME,
    payload: link,
});


