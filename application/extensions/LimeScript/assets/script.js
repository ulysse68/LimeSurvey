// Initial definition of Limesurvey javascript object.
var LS = LS || {};

LS.createUrl = function (route, params)
{
    if (typeof params === 'undefined') {
        params = {};
    }
    var result = LS.data.baseUrl;
    
    if (LS.data.showScriptName)
    {
        result = result + '/index.php';
    }
    
    
    if (LS.data.urlFormat == 'get')
    {
        // Configure route.
        result += '?r=' + route;
         
        // Configure params.
        for (var key in params)
        {
            result = result + '&' + key+ '=' + params[key];
        }
    }
    else
    {
        // Configure route.
        result += route;
        
        // Configure params.
        for (var key in params)
        {
            result = result + '/' + key + '/' + params[key];
        }
    }
    
    return result;
}

/**
 * This function returns the value of a variable.
 */
LS.getValue = function (variableName)
{
    if (LS.variableIsRelevant(variableName))
    {
        var code = LS.p.VariableToCode[variableName];
        if (LS.p.questions[code].type)
        {
            var GUID = LS.p.questions[code].type;
            var id = LS.p.questions[code].id;
            return LS.p.QuestionTypes[GUID].get.call($('#' + id), variableName);
        }
    }
}


/**
 * This function sets the value of a variable (if possible).
 */
LS.setValue = function (variableName, value)
{
    if (LS.p.VariableToCode[variableName])
    {
        var code = LS.p.VariableToCode[variableName];
        if (LS.p.questions[code].type)
        
        {
            var GUID = LS.p.questions[code].type;
            var id = LS.p.questions[code].id;
            LS.p.QuestionTypes[GUID].set.call($('#' + id), variableName, value);
        }
    }
}

LS.questionIsRelevant = function(questionCode)
{
    if (LS.p.questions && LS.p.questions[questionCode] && LS.p.questions[questionCode].relevanceStatus)
    {
        return LS.p.questions[questionCode].relevanceStatus();
    }
    else
    {   // If the variable is known but there is no relevance status, it is always relevant.
        return true;
    }
}
LS.variableIsRelevant = function(variableName)
{
    // Check if variable is known (ie belongs to a question.)
    if (LS.p.VariableToCode[variableName])
    {
        var questionCode = LS.p.VariableToCode[variableName];
        return LS.questionIsRelevant(questionCode);
    
    }
    // If the variable is unknown it is irrelevant.
    return false;
}

// Iterate over each question in order and update its relevance.
LS.updateRelevance = function()
{
    if (LS.p && LS.p.questions) {
        for (var code in LS.p.questions)
        {
            var q = LS.p.questions[code];
            if (LS.questionIsRelevant(code))
            {
                $('div.question#' + q.div).removeClass('irrelevant');
            }
            else
            {
                $('div.question#' + q.div).addClass('irrelevant');
            }
        }
    }
}
// Bind change events.
$(document).ready(function()
{
    if (LS.p && LS.p.questions) {
        for (var code in LS.p.questions)
        {
            var q = LS.p.questions[code];
            LS.p.QuestionTypes[q.type].bindChange.call($('#' + q.id), function () { LS.updateRelevance(); });
        }
    }
    LS.updateRelevance();
});