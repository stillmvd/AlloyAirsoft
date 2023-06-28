import React from "react";
import { connect } from 'react-redux';

class GameCard extends React.Component {
    constructor(props) {
        super(props);

        //sate
        this.state = {
            name: ''
        }

        //bind
        this.handleInput = this.handleInput.bind(this);
    }

    handleInput(event) {
        this.value = this.event.value;
        this.setState(() => ({
            name: this.value
        }))
    }

    render() {
        return (
            <div className={'inputs'}>
                <input placeholder="Game name" type="text" name="name" className={'w-full box-border text-white text-[1.1rem] bg-transparent px-5 h-14 ' +
                    'font-medium rounded-xl ring-2 ring-subwhite focus:outline-none z-20 placeholder:text-subwhite ' +
                    'placeholder:text-base placeholder:font-normal'} onInput={this.handleInput} value={this.state.name}/>
            </div>
        )
    }
}

const mapStateToProps = (store) => {
    return {
        link: store.link,
        name: store.name,
        date: store.date,
        time: store.time,
        polygon: store.polygon,
    };
};

export default connect(mapStateToProps)(GameCard);
