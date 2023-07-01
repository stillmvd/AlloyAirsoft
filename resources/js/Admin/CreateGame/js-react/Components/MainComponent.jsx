import React from "react";
import GameCard from "./GameCard";
import {connect} from "react-redux";
import {
    setDateGame,
    setLinkGoogleGame,
    setLinkIframeGame,
    setNameGame,
    setTimeGame
} from "../redux/actions/actions";

class MainComponent extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        const {
            gameCard,
            prices,
            info,
            rules,
            setNameGameAction,
            setDateGameAction,
            setTimeGameAction,
            setLinkGoogleGameAction,
            setLinkIframeGameAction
        } = this.props;
        return (
            <GameCard
                nameGame={gameCard.nameGame}
                dateGame={gameCard.dateGame}
                linkGoogleGame={gameCard.linkGoogleGame}
                linkIframeGame={gameCard.linkIframeGame}
                timeGame={gameCard.timeGame}
                setNameGame={setNameGameAction}
                setDateGame={setDateGameAction}
                setTimeGame={setTimeGameAction}
                setLinkGoogleGame={setLinkGoogleGameAction}
                setLinkIframeGame={setLinkIframeGameAction}
            >

            </GameCard>
        )
    }
}

const mapStateToProps = (store) => {
    return {
        gameCard: store.gameCard,
        prices: store.prices,
        info: store.info,
        rules: store.rules,
    };
};

const mapDispatchToProps = (dispatch) => {
    return {
        setNameGameAction: (name) => dispatch(setNameGame(name)),
        setDateGameAction: (date) => dispatch(setDateGame(date)),
        setTimeGameAction: (time) => dispatch(setTimeGame(time)),
        setLinkGoogleGameAction: (link) => dispatch(setLinkGoogleGame(link)),
        setLinkIframeGameAction: (link) => dispatch(setLinkIframeGame(link)),
    };
};


export default connect(mapStateToProps, mapDispatchToProps)(MainComponent);
